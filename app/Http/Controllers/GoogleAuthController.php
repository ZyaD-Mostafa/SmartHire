<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    // دالة لإعادة توجيه المستخدم إلى صفحة تسجيل الدخول بجوجل
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // دالة لمعالجة البيانات بعد رجوع المستخدم من جوجل
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // البحث عن المستخدم أو إنشاء حساب جديد إذا لم يكن موجود
            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name'      => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    // هنا بنستخدم كلمة مرور افتراضية؛ لو كان عمود الباسورد قابل لل null تقدر تشيله
                    'password'  => bcrypt('password')
                ]
            );

            Auth::login($user); // تسجيل دخول المستخدم

            // إعادة توجيه المستخدم إلى لوحة التحكم أو أي صفحة ترغب بها
            return redirect()->route('home');
        } catch (\Exception $e) {
            // في حال حدوث خطأ، إعادة التوجيه لصفحة تسجيل الدخول مع رسالة الخطأ
            return redirect()->route('login')->with('error', 'حدث خطأ أثناء تسجيل الدخول باستخدام جوجل.');
        }
    }
}
