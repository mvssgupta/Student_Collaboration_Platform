@extends('layouts.app')


@section('style')
<style>
    .bag{
        background-image: url("{{asset('images/Summary.png')}}");
        background-repeat: no-repeat;
    background-size: cover;
    }
    input.lgcheck{
    width:20px;
    height: 20px;
    }
</style>
@stop

@section('content')
    <div class="h-screen flex justify-center bg-gray-100">
        <div class="lg:w-4/12 w-full h-screen h-full grid grid-row-3 bg-blue-700">
            <div class=" row-span-4">
            </div>
            <div class="row-span-4">
                <div class="flex justify-center mb-5">
                    <h1 class="text-white font-bold text-5xl">SCP</h1>
                </div>
                <div class="" >
                    @if (session('status'))
                        {{-- <script>
                            swal('{{ session('status') }}', '', 'success');
                        </script> --}}
                        <div class="mx-10">

                                <span class="text-white" role="alert">
                                  <strong>{{ session('status') }}</strong>
                                </span>

                        </div>
                        @endif
                    <div class="flex justify-center mb-2 mt-5 ">
                        <a href="{{route('redirectToGoogle')}}" class="bg-white text-blue-800 shadow-xl border border-gray-800 text-xl rounded-md w-full py-2 font-bold mx-10 text-center">Login With Google</a>



                    </div>
                </div>
                <div class="flex justify-between mx-10 text-white text-lg  font-bold">
                    {{-- <a href="{{route('password.update')}}">Forgot password?</a>
                    <a href="{{route('register')}}">Register Now</a> --}}
                </div>
            </div>
            <div class=" row-span-1">
            </div>
        </div>
    </div>
@endsection
