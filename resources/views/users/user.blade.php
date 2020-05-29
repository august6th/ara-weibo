@extends('layouts.common')
@if($is_sign_in == 0)
    @section('title', 'Sign Up')
@else
    @section('title', 'Sign In')
@endif
@section('content')
    <div class="lg:overflow-y-hidden">
        <div
            class="flex justify-center h-screen bg-white md:float-left md:w-1/3 lg:float-left lg:w-1/3 xl:float-left xl:w-1/3">
            <div class="self-center xl:p-16 w-4/5 text-sm" x-data="{open : {{$is_sign_in}}}">
                <div id="sign_in"
                     x-show="open == 1"
                     x-transition:enter="transition ease-in duration-500"
                     x-transition:enter-start="opacity-0 transform"
                     x-transition:enter-end="opacity-100 transform"
                     x-transition:leave="transition opacity-0"
                >
                    @include('layouts.logo')
                    <div class="pt-12">
                        <span class="text-2xl font-bold">Sign in to your account</span>
                    </div>
                    <div class="mb-4 font-medium">
                        <span>Or </span><span class="text-indigo-500">start your 30-day free trial</span>
                    </div>
                    <div class="font-medium">
                        <div class="mb-2">Sign in with</div>
                        <div class="flex space-x-2 text-lg">
                            <button
                                class="w-1/3 py-1 bg-white hover:bg-gray-100 text-gray-600 border border-gray-300 rounded">
                                <i class="fa fa-github" aria-hidden="true"></i>
                            </button>
                            <button
                                class="w-1/3 py-1 bg-white hover:bg-gray-100 text-gray-600 border border-gray-300 rounded">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </button>
                            <button
                                class="w-1/3 py-1 bg-white hover:bg-gray-100 text-gray-600 border border-gray-300 rounded">
                                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="relative py-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm leading-5">
                            <span class="px-4 bg-white text-gray-500">Or continue with</span>
                        </div>
                    </div>
                    <div>
                        <form action="#" method="post">
                            <div class="mb-3">
                                <label class="block mb-1 font-semibold" for="email">Email address</label>
                                <input id="email" type="text" name="email" class="w-full border rounded py-2 px-3">
                            </div>
                            <div class="mb-3">
                                <label class="block mb-1 font-semibold" for="password">Password</label>
                                <input type="password" name="password" id="password"
                                       class="w-full border rounded py-2 px-3">
                            </div>
                            <div class="mb-3 flex justify-between text-xs">
                                <label class="block inline-flex items-center" for="remember_me">
                                    <input id="remember_me" type="checkbox" class="form-checkbox text-indigo-500">
                                    <span class="ml-2">Remember me</span>
                                </label>
                                <a href="#" class="block text-indigo-500">Forgot?</a>
                            </div>
                            <button type="submit"
                                    class="w-full py-2 px-3 border bg-indigo-500 rounded text-white hover:bg-indigo-600">
                                Sign in
                            </button>
                        </form>
                    </div>
                    <div class="relative py-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm leading-5">
                            <span class="px-4 bg-white text-gray-500">Don't have an account?</span>
                        </div>
                    </div>
                    <div>
                        <button @click="open = 0"
                                class="w-full py-2 px-3 border bg-gray-500 rounded text-white hover:bg-gray-600">
                            Register
                        </button>
                    </div>
                </div>
                <div id="register"
                     x-show="open == 0"
                     x-transition:enter="transition ease-in duration-500"
                     x-transition:enter-start="opacity-0 transform"
                     x-transition:enter-end="opacity-100 transform"
                     x-transition:leave="transition opacity-0"
                >
                    @include('layouts.logo')
                    <div class="pt-12 mb-5">
                        <span class="text-2xl font-bold">Register an account</span>
                    </div>
                    @include('shared.errors')
                    <div>
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="block mb-1 font-semibold" for="username">Username</label>
                                <input id="email" type="text" name="username" class="w-full border rounded py-2 px-3">
                            </div>
                            <div class="mb-3">
                                <label class="block mb-1 font-semibold" for="register-email">Email address</label>
                                <input id="register-email" type="text" name="email" value="{{ old('email') }}"
                                       class="w-full border rounded py-2 px-3">
                            </div>
                            <div class="mb-3">
                                <label class="block mb-1 font-semibold" for="register-password">Password</label>
                                <input type="password" name="password" id="register-password"
                                       class="w-full border rounded py-2 px-3">
                            </div>
                            <div class="mb-6">
                                <label class="block mb-1 font-semibold" for="confirm-password">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="confirm-password"
                                       class="w-full border rounded py-2 px-3">
                            </div>
                            <button type="submit"
                                    class="w-full py-2 px-3 border bg-indigo-500 rounded text-white hover:bg-indigo-600">
                                Register
                            </button>
                        </form>
                        <div class="relative py-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm leading-5">
                                <span class="px-4 bg-white text-gray-500">Already have an account?</span>
                            </div>
                        </div>
                        <button @click="open = 1"
                                class="w-full py-2 px-3 border bg-gray-500 rounded text-white hover:bg-gray-600">
                            Log in
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="hidden md:block md:float-right md:w-2/3 lg:block lg:float-right lg:w-2/3 xl:block xl:float-right xl:w-2/3">
            <img src="/images/wallpaper.jpg" alt="" class="object-cover h-screen">
        </div>
    </div>
@stop
