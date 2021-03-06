   @extends('app')

@section('content')
                        

           <div class="formSearch" style="background-color:#FCFCFC;">
            <form id="formSearch" method="GET" action="{{ url('/announcement/search') }}" {{--onsubmit="clearEmptyValues()"--}}>
              {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                <div style="padding-top:20px;padding-left:25px;padding-right:25px;">
                    <div class="row">
                        <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12">
                            <p>Тип недвижимости</p>
                            <select class="form-control" name="typeofproperty">
                                <option value="">Вся недвижимость</option>
                                <option selected="selected" value="1">Квартира</option>
                                <option value="2">Комната</option>
                                <option>Дом</option>
                                <option>Участок</option>
                                <option>Гараж</option>
                            </select>
                       
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="blankCheckbox" name="with_foto" value="yes" aria-label="...">с фото
                                </label>
                            </div>
                        </div>
                            <div class="col-lg-2 col-md-5 col-sm-5 col-xs-12">
                            <p>Комнат</p>
                            <div class="btn-group btn-group-sm" data-toggle="buttons" id="mainButtons">
                                <label class="btn btn-primary {{--active--}}">
                                    <input type="checkbox" autocomplete="off" value="1" 
                                    name="numofrooms[]" {{--checked--}}> 1
                                </label>
                                <label class="btn btn-primary">
                                    <input type="checkbox" autocomplete="off" value="2" name="numofrooms[]"> 2
                                </label>
                                <label class="btn btn-primary">
                                    <input type="checkbox" autocomplete="off" value="3" name="numofrooms[]"> 3
                                </label>
                                <label class="btn btn-primary">
                                    <input type="checkbox" autocomplete="off" value="4" name="numofrooms[]"> 4
                                </label>
                                <label class="btn btn-primary">
                                    <input type="checkbox" autocomplete="off" value="5" name="numofrooms[]"> 5
                                </label>
                            </div>           
                        </div>
                        <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                            <p>Район</p>
                            <select class="form-control" name="area">
                                <option value="">----------</option>
                                <option value="1">Жовтневый</option>
                                <option value="3">Хортицкий</option>
                                <option value="2">Орджоникидзевский</option>
                                <option value="4">Шевченковский</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12" style="padding:0px 10px;">
                            <p>Цена</p>
                            <div class="form-inline">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:0px 5px;">
                                <input type="text" class="form-control"  placeholder="От" size="5" name="price_ot">
                                 </div>
                                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6" style="padding:0px 5px;">
                                <input type="text" class="form-control"  placeholder="До" size="5" name="price_do">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center" style="padding:0px 5px;">
                                <select class="form-control" name="currency">
                                    <option>грн</option>
                                    <option selected="selected">$</option>
                                    <option>€</option>
                                </select>
                                </div>
                                    </div>


                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12" style="padding:0px 10px;">
                            <button type="submit" id="buttonSearch" class="btn btn-danger btn-lg btn-block" style="margin-top:30px;" data-loading-text="Поиск..." autocomplete="off">Найти</button>
                            
                            <p style="padding-top:10px;">
                                <a href="#collapseMoreParam" data-toggle="collapse" href="#collapsePhone" aria-expanded="false" aria-controls="collapseMoreParam" style="text-decoration:none;"><span class="caret"></span>
                                    <span style="border-bottom: 1px dashed;">Больше параметров</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
            <div class="collapse" id="collapseMoreParam" style="background-color:#E6E6E6;">ccccccccccccc</div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h3>Найдено {{$amount}} объявлений в Запорожье </h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top:15px;">
                    <form id="formSort" method="GET" action="{{ url('/announcement/sort') }}">
                        <!--  <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                        <h5 style="float:left;">Сортировать</h5>
                        <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12" style="padding:0px 5px;">
                            <select class="form-control" name="sortForm" id="sortForm" style="padding:0px;">
                                <option value="">Выберете...</option>
                                <option value="date">по дате</option>
                                <option value="price_up">по возрастанию цены</option>
                                <option value="price_down">по убыванию цены</option>
                            </select>
                        </div>
                        <h5 style="float:left;">Отображать</h5>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding:0px 5px;">
                            <select class="form-control" id="sortFormDate" name="sortFormDate" style="padding:0px;">
                                <option value="">Выберете...</option>
                                <option value="all_time">за все время</option>
                                <option value="three_days">за 3 дня</option>
                                <option value="week">за неделю</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
            <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-5 hidden-xs">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d21423.493081801666!2d35.13475563764171!3d47.84082090160826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1435499698464" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="text-center col-lg-6 col-md-6 col-sm-7 col-xs-12">

               {!! $announcements->appends(isset($input) ? $input : '')->render() !!}
      

                @include('partials.announcements')


               {!! $announcements->appends(isset($input) ? $input : '')->render() !!}
 

                        </div>

            </div>



        <!-- footer -->
        <div class="row">

            <div class="col-lg-6  col-md-6 col-sm-6 col-xs-6">
                <h2>Продажа жилья в Запорожье </h2>
                <p>Рынок недвижимости Запорожья отличается высокой активностью, что неудивительно, учитывая огромный экономический потенциал города. Портал mesto.ua предоставляет своим посетителям огромный выбор жилья в Запорожье – от недорогих комнат до элитных особняков. Возможность напрямую связаться с собственником недвижимости, подробные сведения о каждом объекте и фотографии позволяют вам купить квартиру в Запорожье быстро и максимально выгодно.</p>

                <p>Просто задайте параметры поиска – по виду недвижимости, количеству комнат и цене – и на экране компьютера вы увидите только те квартиры в Запорожье, которые подходят вам больше всего. На нашем сайте представлены квартиры, расположенные в любом районе города: Жовтневом, Заводском, Ленинском, Коммунарском, Хортицком, Орджоникидзевском или Шевченковском. Выбирайте для себя максимально удобное место проживания, близкое к месту работы, поликлинике, детскому саду или школе.</p>

                <p>Продажа квартир в Запорожье с порталом mesto.ua – уникальная возможность быстро и легко найти потенциального покупателя. Вы сможете убедиться в этом самостоятельно, посетив наш ресурс!</p>
       

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:25px;">

                <strong>Продажа квартир по количеству комнат »</strong>
                <br> На вторичном рынке однокомнатная квартира в Запорожье
                <br> Купить двухкомнатное жилье в Запорожье
                <br> На вторичном рынке трехкомнатная квартира в Запорожье
                <br> Продать четырехкомнатную квартиру в Запорожье
                <br> Покупка пятикомнатной квартиры в Запорожье
                <br>

                <strong>Популярные объявления Запорожья »</strong>
                <br> На вторичном рынке комната в Запорожье
                <br> Купить недвижимость в Запорожье
                <br> На вторичном рынке дом в Запорожье
                <br>

                <strong>Продажа квартир по районам Запорожья »</strong>
                <br> Продажа жилья без посредников в 16-й микрорайоне
                <br> Покупка квартиры в 2-й Шевченковский микрорайон
                <br> Продать квартиру в Бородинском
                <br>



            </div>

        </div>
       
       @stop