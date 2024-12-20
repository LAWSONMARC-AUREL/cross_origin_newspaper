<div>
    @extends('layouts.app')
        @section('content')
        <div class="d-flex flex-column w-100 mt-2">
            <div class=" container">
                <h1 class="p-2">S'inscrire</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST" class="m-3 p-1">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label" style="color: #ff7f32;">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label" style="color: #ff7f32;">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label" style="color: #ff7f32;">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label" style="color: #ff7f32;">Confirm Password:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-warning w-100" style="background-color: #ff7f32; border-color: #ff7f32;">Register</button>
                </form>

            </div>
        @endsection

</div>
