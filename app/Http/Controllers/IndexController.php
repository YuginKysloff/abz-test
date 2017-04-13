<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;

class IndexController extends Controller
{
    public function index()
    {
        $query = Worker::with('post')->get()->toArray();

//        dump($query);

        // Подготовка данных для построения дерева
        $arr = [];
        if($query) {
            foreach($query as $item) {
                $arr[$item['pid']][$item['id']] = $item['post']['name'].' - '.$item['name'];
            }
        }

        // Вызов функции построения дерева
        $data['tree'] = $this->getTree($arr, 0);

        return view('tree', $data);
    }

    /**
     * Рекурсивная функция построения дерева
     *
     * @param array $arr - данные для дерева
     * @param integer $parent - id родителя
     * @return string
     */
    private function getTree($arr, $parent) {

        // Если существуют строки с данным id родителя перебираем их
        $result = '';
        if (isset($arr[$parent])) {
            $result .= '<blockquote class="col-sm-offset-1">';
            foreach ($arr[$parent] as $key => $value) {

                // Формирование строки результата
                $result .= '<div>'.$value;

                // Рекурсивный вызов функции построения дерева
                $result .= $this->getTree($arr, $key);
                $result .= '</div>';
            }
            $result .= '</blockquote>';
        } else {
            return null;
        }
        return $result;
    }
}