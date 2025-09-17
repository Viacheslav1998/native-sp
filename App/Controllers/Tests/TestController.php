<?php

/**
 * Эти тестовые классы ресурсы контроллеры просто для того
 *  что бы иногде не путаться и не терятся даже порой в элементарных вещах
 * я следую тонкому контроллеру -
 * да ресурсы назвать ресурсами сложно можно сказать не возможно..
 * но на идеальный код времени уже нет
 * а улучшать прослойки можно всегда до бессконечности
 * тут просто проверки на всякие сущности и вещи - это не боевой проект
 */

namespace App\Controllers\Tests;

use App\Helpers\Request;
use App\Models\Resources\TestResource;
use App\Validation\TestFormValidators;

class TestController extends \Core\Controller
{
    private TestResource $testResource;

    public function __construct()
    {
        parent::__construct();
        $validator = new TestFormValidators();
        $this->testResource = new TestResource($validator);
    }

    public function testIndex()
    {
        header('Content-Type: application/json; charset=utf-8');

        $data = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'title' => $_POST['title'] ?? '',
            'date' => $_POST['date'] ?? '',
            'description' => $_POST['description'] ?? '',
            'assessment' => $_POST['assessment'] ?? '',
        ];

        echo json_encode([
            'status' => 'ok',
            'data' => $data
        ]);
    }

    /**
     * we're getting a php response back.
     */
    public function testGetDataOneMoreTime()
    {
        header('Content-Type: application/json; charset=utf-8');

        // getting data into the controller this way is not good
        $data = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'title' => $_POST['title'] ?? '',
            'age' => $_POST['age'] ?? ''
        ];

        echo json_encode([
            'status' => 'ok',
            'data' => $data
        ]);
    }

    /**
     * test Save data
     */
    public function testPostTestData()
    {
        $data = Request::post();
        $data['image'] = Request::file('image');

        return $this->testResource->save($data);
    }

    /**
     * validation of array methods
     */
    public function testArrayAllKeys()
    {
        return $this->testResource->testArrayManipulation();
    }

    /**
     * testing session
     * check session
     * create session[key]=val
     */
    public function testSession()
    {

        // $_SESSION['user']['role'] = 'admin'
        // unset($_SESSION['user']); destroy current session
        // dont use session_destroy

        //   if(isset($_SESSION['user'])) {
        //       echo "Сессия обьявлена";
        //   } else {
        //       echo "Сессия не существует";
        //   }
    }

    // public function create(){}     // form create (GET)
    // public function store(){}      // save data (POST)
    // public function show($id){}    // show one (GET)
    // public function edit($id){}    // form edit (GET)
    // public function update($id){}  // update/fresh (PUT/PATCH)
    // public function destroy($id){} // delete (DELETE)
}
