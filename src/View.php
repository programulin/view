<?php
namespace Programulin;

class View
{
    private $path;

    /**
     * @param string $path Путь к папке с шаблонами.
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @param string Ссылка на файл относительно папки с шаблонами, без расширения.
     * @param array $data Массив подставляемых переменных, например ['title' => 'Заголовок'].
     * @return string Шаблон с подставленными значениями.
     * @throws Exception
     */
    public function get($file_path, array $data = [])
    {
        extract($data);

        ob_start();
        require "{$this->path}$file_path.php";
        return ob_get_clean();
    }
}