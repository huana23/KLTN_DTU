<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckRoleLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        if (!$user) {
            return redirect()->route('auth.login');  // Đảm bảo bạn đã định nghĩa route 'auth.login'
        }

        // Kiểm tra quyền người dùng (admin = 1, user = 2)
        if ($user->is_admin == 1) {
            // Nếu là admin, chuyển hướng đến trang quản trị
            return redirect()->route('admin.dashboard');
        } elseif ($user->is_admin == 0) {
            // Nếu là user, chuyển hướng đến trang người dùng
            return redirect()->route('client.home');
        }
        return $next($request);
    }
}
