<?php

namespace App\Livewire;
use App\Models\Todo;


use Livewire\Component;

class Todoindex extends Component
{
    public $todos;
    public $title;

    public function mount()
    {
        $this->todos = Todo::all();
    }

    public function addTodo()
    {
        $this->validate([
            'title' => 'required',
        ]);

        $todo = Todo::create(['title' => $this->title]);
        $this->todos->prepend($todo);
        $this->title = '';
    }

    public function removeTodo($id)
    {
        $todo = Todo::find($id);
        if ($todo) {
            $todo->delete();
            $this->todos = $this->todos->except($id);
        }
    }
    public function render()
    {
        return view('livewire.todoindex');
    }
}
