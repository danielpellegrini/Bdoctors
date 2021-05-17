<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Document</title>
</head>
<body>

    <div class="container">

        <form action="{{ route('review.store', [ 'user_id' => $user->id]) }}" method="post">
            @csrf
            @method('POST')

            {{--  <div class="form-group">
                <label for="user_id">Doctor</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach ($users as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }} {{ $doctor->lastname }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="form-group position-relative">
                <label for="name" class="form-label">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Name" value="{{isset($review) ? $review->name : '' }}">
                <div class="invalid-tooltip">
                    {{ $errors->first('name') }}
                </div>
            </div>

            <div class="form-group position-relative">
                <label for="email">Email</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" type="text" name="email" placeholder="Email" value="{{isset($review) ? $review->email : '' }}">
                <div class="invalid-tooltip">
                    {{ $errors->first('email') }}
                </div>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" type="text" name="body" placeholder="Body" rows="6" value="{{isset($review) ? $review->body : '' }}"></textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('body') }}
                </div>
            </div>

            <input type="submit" value="Send">
        </form>
    </div>

</body>
</html>
