<?php


namespace App;


use App\Models\Article;

class AdminDataTable
{
    protected array $models;
    protected array $data;
    protected array $table;

    public function __construct(array $data, array $models)
    {
        $this->models = $models;
        $this->data = $data;
    }

    public function prepare()
    {
        foreach ($this->data as $article) {
            $data = '';
            foreach ($this->models as $value) {
                $data .= '<td>' . $value($article) . '</td>';
            }
            $this->table[] = $data;

        }
    }

    public function render(){
        $this->prepare();
        return $this->table;
    }

}