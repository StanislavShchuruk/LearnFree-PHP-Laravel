@extends('layouts.layout_main')

@section('content')

<div class="container  form-horizontal">
    <div class="container-profile">
        <form method="POST" action="{{ route('updateProfile') }}">
                        {{ csrf_field() }}
            <div class="form-group">
                <div class="page-header">
                    <h2 class="text-center">Настройки профиля</h2>
                </div>
            </div>
            </br>
            <div class="form-group">
                <label class="col-md-3 control-label">E-Mail:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" value="{{ $email }}" readonly>
                </div>
                <a href="#" class="col-md-1">Изменить</a>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Пароль:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" value="********" readonly>
                </div>
                <a href="#" class="col-md-1">Изменить</a>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Имя:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name"
                           value="{{ Auth::user()->name }}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Фамилия:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="surname"
                           value="{{ Auth::user()->surname }}"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Никнейм:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nickname"
                           value="{{ Auth::user()->nickname }}" required />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3">Дата рождения:</label>
                <div class="col-md-6 date-picker">
                    <div class="col-md-3 date_picker_el">
                        <input id="selected-day-of-birth" type="hidden"
                               @if ( Auth::user()->date_of_birth != null )
                                    value="{{ Auth::user()->date_of_birth->format('d') }}"
                               @endif
                        />
                        <select id="days" class="form-control" name="day">
                          <option>--</option>
                        </select>
                    </div>
                    <div class="col-md-5 date_picker_el">
                        <input id="selected-month-of-birth" type="hidden"
                               @if ( Auth::user()->date_of_birth != null )
                                    value="{{ Auth::user()->date_of_birth->format('m') }}"
                               @endif
                        />
                        <select id="monthes" class="form-control" name="month">
                          <option>--</option>
                        </select>
                    </div>
                    <div class="col-md-4 date_picker_el">
                        <input id="selected-year-of-birth" type="hidden"
                               @if ( Auth::user()->date_of_birth != null )
                                    value="{{ Auth::user()->date_of_birth->format('Y') }}"
                               @endif
                        />
                        <select id="years" class="form-control" name="year">
                          <option>--</option>
                        </select>
                    </div>
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-md-3">Пол:</label>
                <div class="col-md-3">
                  <label class="radio-inline">
                    <input type="radio" name="gender_id" value="{{ $male_id }}" 
                        @if ($male_id === Auth::user()->gender_id) 
                             checked
                        @endif
                    />
                          Мужской
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="radio-inline">
                    <input type="radio" name="gender_id" value="{{ $female_id }}" 
                        @if ($female_id === Auth::user()->gender_id) 
                            checked
                        @endif
                    />
                          Женский
                  </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3">Страна:</label>
                <div class="col-md-6">
                    <input id="selected-country-id" type="hidden" value="{{ Auth::user()->country_id }}"/>
                    <select id="countries" class="form-control" name="country_id">
                      <option value="-1" >--</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3">Регион:</label>
                <div class="col-md-6">
                    <input id="selected-region-id" type="hidden" value="{{ Auth::user()->region_id }}"/>
                    <select id="regions" class="form-control" name="region_id">
                      <option value="-1" >--</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3">Город:</label>
                <div class="col-md-6">
                    <input id="selected-city-id" type="hidden" value="{{ Auth::user()->city_id }}"/>
                    <select id="cities" class="form-control" name="city_id">
                      <option value="-1" >--</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Показывать:</label>
                <div class="col-md-3">
                  <label class="radio-inline">
                    <input type="radio" name="show_name_id" value="{{ $fullname_id }}"
                        @if ($fullname_id === Auth::user()->show_name_id) 
                             checked
                        @endif
                    />
                            Имя и фамилия
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="radio-inline">
                    <input type="radio" name="show_name_id" value="{{ $nickname_id }}"
                        @if ($nickname_id === Auth::user()->show_name_id) 
                            checked
                        @endif
                    />
                            Никнейм
                  </label>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <div class="col-md-offset-5">
                    <button type="submit" class="btn btn-primary col-md-4">Сохранить</button>
                </div>
            </div>
        </form>
    </div>   
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection