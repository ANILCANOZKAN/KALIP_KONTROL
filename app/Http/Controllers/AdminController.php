<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\kalip;
use App\Models\Update;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

function updated($firstKalip, kalip $kalip)
{
    $aciklama ="";
    if($firstKalip['ad'] != $kalip->ad){
        $aciklama = $aciklama." '".$firstKalip['ad']."' isimli kalıp adı '".$kalip->ad."' olarak değiştirilmiştir. ";
    }
    if($firstKalip['category_id'] != $kalip->category_id){
        $firstCategoryadi = Category::firstWhere('id',$firstKalip['category_id'])->name;
        $categoryadi = Category::firstWhere('id',$kalip->category_id)->name;
        $aciklama = $aciklama." '".$firstCategoryadi."' isimli kategori '".$categoryadi."' olarak değiştirilmiştir. ";
    }
    if($firstKalip['durum'] != $kalip->durum){
        $aciklama = $aciklama." '".$firstKalip['durum']."' durumu '".$kalip->durum."' olarak değiştirilmiştir. ";
    }
    if($firstKalip['rafno'] != $kalip->rafno){
        $aciklama = $aciklama." '".$firstKalip['rafno']."' olan raf numarası '".$kalip->rafno."' olarak değiştirilmiştir. ";
    }
    if($firstKalip['gozadedi'] != $kalip->gozadedi){
        $aciklama = $aciklama." '".$firstKalip['gozadedi']."' göz adedi '".$kalip->gozadedi."' olarak değiştirilmiştir. ";
    }
    if($firstKalip['agizcapi'] != $kalip->agizcapi){
        $aciklama = $aciklama." '".$firstKalip['agizcapi']."' ağız çapı '".$kalip->agizcapi."' olarak değiştirilmiştir. ";
    }
    if($firstKalip['ceneyapisi'] != $kalip->ceneyapisi){
        $aciklama = $aciklama." '".$firstKalip['ceneyapisi']."' çene yapısı '".$kalip->ceneyapisi."' olarak değiştirilmiştir. ";
    }
    if($firstKalip['agirlik'] != $kalip->agirlik){
        $aciklama = $aciklama." '".$firstKalip['agirlik']."' olan ağırlığı '".$kalip->agirlik."' olarak değiştirilmiştir. ";
    }
    if($firstKalip['date'] != $kalip->date){
        $aciklama = $aciklama." '".$firstKalip['date']."' olan oluşturma tarih bilgisi '".$kalip->date."' olarak değiştirilmiştir. ";
    }
    if($firstKalip['gonderilenyer'] != $kalip->gonderilenyer){
        $aciklama = $aciklama." '".$firstKalip['gonderilenyer']."' gönderilme yeri '".$kalip->gonderilenyer."' olarak değiştirilmiştir. ";
    }
    if($firstKalip['aciklama'] != $kalip->aciklama){
        $aciklama = $aciklama." '".$firstKalip['aciklama']."' açıklama bilgisi '".$kalip->aciklama."' olarak değiştirilmiştir. ";
    }
    return $aciklama;
}

function firstKalip($kalip)
{
    $firstKalip['ad'] = $kalip->ad;
    $firstKalip['category_id'] = $kalip->category_id;
    $firstKalip['durum'] = $kalip->durum;
    $firstKalip['rafno'] = $kalip->rafno;
    $firstKalip['gozadedi'] = $kalip->gozadedi;
    $firstKalip['agizcapi'] = $kalip->agizcapi;
    $firstKalip['ceneyapisi'] = $kalip->ceneyapisi;
    $firstKalip['agirlik'] = $kalip->agirlik;
    $firstKalip['date'] = $kalip->date;
    $firstKalip['gonderilenyer'] = $kalip->gonderilenyer;
    $firstKalip['aciklama'] = $kalip->aciklama;
    return $firstKalip;
}

class AdminController extends Controller
{
    public function index(){
        return view('admin.section.index', [
            'users' => User::latest()->filter(request(['search', 'user']))->paginate(10)->withQueryString(),
        ]);
    }
    public function kalips(){
        return view('admin.section.kalips', [
            'kalips' => kalip::latest()->filter(request(['search', 'category']))->paginate(10)->withQueryString(),
        ]);
    }
    public function categories(){
        return view('admin.section.categories', [
            'categories' => Category::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }
    public function updated(){
        return view('admin.section.updated', [
            'updates' => Update::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }
    public function kategoriCreate(){
        return view('kategoriekle',[
        'categories' => Category::all()]);
    }
    public function kategoriStore(){
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('categories', 'name')]
        ]);
        if(strlen($attributes['name']) <= 255 ) {
            Category::create($attributes);
            return back()->with('success', 'Kategori başarıyla eklendi.');
        }
        return back()->with('error', 'Kategori uzunluğu 255 karakterden fazla olamaz.');
    }
    public function deleteKategori(Category $category){
        $category->delete();
        return back()->with('success', 'Kategori başarıyla silindi.');
    }
    public function kalipCreate(){
        return view('kalipekle', [
            'categories' => Category::all()
        ]);
    }
    public function kalipStore(Request $request){
        $attributes = request()->validate([
            'ad' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'durum' => 'nullable',
            'rafno' => 'nullable',
            'gozadedi' => 'nullable',
            'agizcapi' => 'nullable',
            'ceneyapisi' => 'nullable',
            'agirlik' => 'nullable',
            'gonderilenyer' => 'nullable',
            'aciklama' => 'nullable'
        ]);
        $kalip = kalip::create($attributes);
        if($request->file('file') != null) {
            foreach ($request->file('file') as $imagefile) {
                $image = new File;
                $path = $imagefile->store('thumbnails');
                $image->file = $path;
                $image->kalip_id = $kalip->id;
                $image->save();
            }
        }
        return back()->with('success', 'Kalıp başarıyla eklendi.');
    }
    public function updateKalips(kalip $kalip){
        return view('kalipUpdate',[
            'kalip' => $kalip,
            'categories' => Category::all()
        ]);
    }
    public function updateKalipsStore(kalip $kalip, Request $request){
        $attributes = request()->validate([
            'ad' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'durum' => 'nullable',
            'rafno' => 'nullable',
            'gozadedi' => 'nullable',
            'agizcapi' => 'nullable',
            'ceneyapisi' => 'nullable',
            'agirlik' => 'nullable',
            'gonderilenyer' => 'nullable',
            'aciklama' => 'nullable'
        ]);
        $firstKalip = firstKalip($kalip);
        $kalip->update($attributes);
        $kalip->save();
        $update['aciklama'] = updated($firstKalip, $kalip);
        $update['user_id']=auth()->id();
        $update['kalip_id']=$kalip->id;
        Update::create($update);
        if($request->boolean('checkbox')){
            $files = File::where('kalip_id', $kalip->id)->get();
            foreach ($files as $file){
                unlink("C:\KALIP\storage\app\public/".$file->file);
                $file->delete();
            }
            if($request->file('file') != null) {
                foreach ($request->file('file') as $imagefile) {
                    $image = new File;
                    $path = $imagefile->store('thumbnails');
                    $image->file = $path;
                    $image->kalip_id = $kalip->id;
                    $image->save();
                }
            }
            return back()->with('success', 'Kalıp başarıyla güncellendi.');
        } else {
            if($request->file('file') != null) {
                foreach ($request->file('file') as $imagefile) {
                    $image = new File;
                    $path = $imagefile->store('thumbnails');
                    $image->file = $path;
                    $image->kalip_id = $kalip->id;
                    $image->save();
                }
            }
        }
        return back()->with('success', 'Kalıp başarıyla güncellendi.');
    }
    public function deleteKalips(kalip $kalip){
        $kalip->delete();
        return back()->with('success', 'Kalıp başarıyla silindi.');
    }
    public function userUpdate(User $user){
        $attributes = request()->validate([
            'role' => 'required|min:0|max:3'
        ]);
        if($attributes['role'] == 3){
            return back()->with('error', 'Mutlak admin yetkisi verilemez.');
        }
        $user->role = $attributes['role'];
        $user->save();
        return back()->with('success', $user->name.' '.$user->surname.' adlı kullanıcı başarıyla güncellendi.');
    }
    public function userDelete(User $user){
        if($user->role == 3){
            return back()->with('error', 'Mutlak adminler silinemez.');
        }
        $user->delete();
        return back()->with('success', 'Kullanıcı başarıyla silindi.');
    }
}
