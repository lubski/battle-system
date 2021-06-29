<?php


namespace BattleSystem;


trait NameTrait
{
    protected string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        if(!empty($name)) {
            $this->name = $name;
            return;
        }

        $this->generateName();
    }

    private function generateName():string {
        $this->name = str_replace(__NAMESPACE__."\\", '' , get_class($this));
    }


}