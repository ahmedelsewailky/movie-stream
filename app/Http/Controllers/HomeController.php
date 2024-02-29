<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Display profile page for auth user.
     *
     * @return \Illuminate\View\View
     */
    public function profile(): \Illuminate\View\View
    {
        return view('auth.profile', [
            'auth' => auth()->user()
        ]);
    }

    /**
     * Handling auth user image avatar
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateImageAvatar(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048']
        ], [
            'image.required' => 'قم بتحميل الصورة من جهازك',
            'image.image' => 'الملف غير صالح',
            'image.mimes' => 'امتداد الصورة غير مدعوم',
            'image.max' => 'حجم الملف كبير'
        ]);
        $user = auth()->user();
        if ($user->image) {
            unlink(storage_path('app\\public\\') . $user->image);
        }
        $user->update([
            'image' => $request->image->store('users', 'public')
        ]);
        Alert::success('تهانينا', 'تم تغيير صورة ملفك الشخصي بنجاح');
        return back();
    }

    /**
     * Update auth user personal informations
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePersonalInformations(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();

        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:users,username,' . $user->id],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        ], $this->personalValidateMessage());

        $user->fill($validate);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        };

        $user->save();

        Alert::success('تهانينا', 'تم حفظ البيانات بنجاح');
        return back();
    }

    /**
     * Change auth password
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UpdatePassword(Request $request):\Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();

        $user->update($request->validate([
            'password' => ['required', Password::min(8)->letters()->numbers()],
            'password_confirmation' => ['required', 'same:password']
        ], $this->passwordValidateMessage()));

        Alert::success('تهانينا', 'تم تغيير كلمة المرور بنجاح');
        return back();
    }

    /**
     * Define a messages for personal informations request
     *
     * @return array
     */
    private function personalValidateMessage(): array
    {
        return [
            'name.required' => 'لا يمكن ترك اسمك فارغا',
            'name.string' => 'الاسم غير صحيح',
            'name.max' => 'الاسم طويل جدا',
            'username.required' => 'يرجي كتابة اسم المستخدم',
            'username.string' => 'اسم المستخدم غير صحيح',
            'username.unique' => 'هذا الاسم موجود بالفعل',
            'email.required' => 'لا يمكن ترك البريد فارغا',
            'email.email' => 'هذا البريد غير صحيح',
            'email.unique' => 'هذا البريد مستخدم بالفعل',
        ];
    }

    /**
     * Define a messages for password validation request
     *
     * @return array
     */
    private function passwordValidateMessage(): array
    {
        return [
            'password.required' => 'ادخل كلمة المرور الجديدة',
            'password.min' => 'يجب ألا يقل كلة المرور عن 8 احرف',
            'password.letters' => 'يجب ان تحتوي كلمة المرور علي حرف واحد علي الأقل',
            'password.numbers' => 'يجب ان تحتوي كلمة المرور علي رقم واحد علي الاقل',
            'password_confirmation.required' => 'اعد ادخال كلمة المرور',
            'password_confirmation.same' => 'كلمة المرور غير مطابقة'
        ];
    }
}
