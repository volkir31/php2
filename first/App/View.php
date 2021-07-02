<?php


namespace App;

class View implements \Countable, \Iterator
{
    private int $position = 0;
    protected array $data;

   use Traits\Magic;

    /**
     * @param string $template
     * @return false|string
     */
    public function render(string $template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display(string $template)
    {
        echo $this->render($template);
    }

    public function count(): int
    {
        return count($this->articles);
    }

    public function current()
    {
        return $this->articles[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->articles);
    }

    public function rewind()
    {
        $this->position= 0;
    }
}