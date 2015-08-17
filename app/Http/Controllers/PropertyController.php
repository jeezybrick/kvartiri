<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Input;
use Validator;
use Redirect;
use Session;
use Storage;


use App\Property;
use App\City;
use App\User;
use App\Area;
use App\NumberOfRooms;
use App\TypeOfProperty;

use App\Http\Requests;
use App\Http\Requests\AnnouncementRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    // Метод middleware в конструкторе для редиректа неавторизированных пользователей
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    // Метод для поиска-сортировки обьявлений
    public function search()
    {   //Получаем все данные с формы в виде массива
        $input = Input::all();

        //Очищаем пустые значения
        $input = array_filter($input);

        //Обращаемся к методу  сортировки в модели Property
        $announcements = Property::search($input);

        // Считаем количество отсортированных обьявлений
        $amount = $announcements->count();

        // Делаем по 5 обьявлений на каждую страницу 
        // встроенной функцией ларавел paginate
        $announcements = $announcements->paginate(5);

        // Назначаем патч в адресной строке для paginate
        $announcements->setPath('search');

        // Возвращаем вью мэйн с переменными
        return view('main', compact('announcements', 'amount', 'input'));
    }

// Метод для сортировки обьявлений по дате,цене или его давности
    public function sort()
    {
        $input = array_filter(Input::all());
        //dd($input);
        $announcements = Property::sort($input);
        $amount = $announcements->count();
        $announcements = $announcements->paginate(5);
        $announcements->setPath('sort');
        return view('main', compact('announcements', 'amount', 'input'));

    }

// Метод для вывода данных для главной страницы
    public function index()
    {

        $announcements = Property::latest()->paginate(5);
        $announcements->setPath('announcement');
        $amount = Property::amount();
        return view('main', compact('announcements', 'amount'));
    }

// Метод для вью создания обьявления
    public function create()
    {

        $area = Area::lists('name', 'id');
        $typeOfProperty = TypeOfProperty::lists('type', 'id');
        $numberOfRooms = NumberOfRooms::lists('number', 'id');
        $city = City::lists('city', 'id');

        return view('announcements.create',
            compact('area', 'typeOfProperty', 'numberOfRooms', 'city'));

    }

    /**
     *Метод для сохранения обьявления в БД и
     *временного сообщения о его успешном сохранении пользователю
     */
    public function store(AnnouncementRequest $request)
    {
        //Обращаемся к методу для сохранения обьявления
        $this->createAnnouncement($request);
        //Всплывающее сообщение об успешном добавлении обьявления       
        \Session::flash('flash_message', 'Ваша обьявление было создано!');

        return redirect('/');
    }

// Метод для вью отдельного обьявления
    public function show($id)
    {
        $announcement = Property::find($id);
        $time = $announcement->creation_time();
        $sameAnnon = Property::where('price','=',$announcement->price)
            ->where('area_id','=',$announcement->area->first()->id)
            ->take(3)->get();
      //  dd($announcement);
        if (is_null($announcement)) {
            abort(404);
        }
        return view('announcements.show', compact('announcement', 'time','sameAnnon'));
    }

// Метод для сохранения обьявления в БД
    private function createAnnouncement(AnnouncementRequest $request)
    {

        $input = Input::all();
        // dd($input);
        $announcement = new Property([
            'price' => $input['price'],
            'street' => $input['street'],
            'space' => $input['space'],
            'city_id' => $input['city'],
            'description' => $input['description'],
            'currency' => $input['currency'],
            'number_of_rooms_id' => $input['numberOfRooms'],
            'area_id' => $input['area'],
            'type_of_property_id' => $input['typeOfProperty']
        ]);
        // dd($announcement);

        // Сохраняем данные в БД с id залогиненного пользователя
        Auth::user()->announcements()->save($announcement);
        $announcement->saveImage($announcement);


        return $announcement;
    }


}
