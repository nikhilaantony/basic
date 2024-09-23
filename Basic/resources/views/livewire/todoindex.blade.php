<div>
    <h1>To-Do List</h1>
    <form wire:submit.prevent="addTodo">
        <input type="text" wire:model="title" placeholder="New Task" />
        <button type="submit">Add</button>
        @error('title') <span>{{ $message }}</span> @enderror
    </form>

    <ul>
        @foreach($todos as $todo)
            <li>
                {{ $todo->title }}
                <button wire:click="removeTodo({{ $todo->id }})">Delete</button>
            </li>
        @endforeach
    </ul>
</div>
