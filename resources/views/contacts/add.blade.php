@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 m-auto">
            <div class="contact-form">
                <h1>اتصل بنا</h1>
                <p class="hint-text">زائرنا الكريم، يسعدنا التواصل معك، في حال كان هناك استفسار يرجى إضافة بيانات اتصالك
                </p>
                <form action="  {{ url('/store') }}  " method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputFirstName">الاسم</label>
                                <input type="text" class="form-control" id="inputFirstName" name="first_name" required="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputLastName">العائلة</label>
                                <input type="text" class="form-control" id="inputLastName" name="last_name" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" required="">
                    </div>

                    <input type="submit" class="btn btn-primary" value="إرسال">
                </form>
            </div>
        </div>
    </div>
@endsection
