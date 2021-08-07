<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use Livewire\WithFileUploads;

class Books extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $code, $name, $image, $author, $price, $year, $description, $n_pages, $format_b, $editorial;
    public $updateMode = false;
	public $deleteId = '';

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.books.view', [
			'books' => Book::latest()
						->orWhere('code', 'LIKE', $keyWord)
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('image', 'LIKE', $keyWord)
						->orWhere('author', 'LIKE', $keyWord)
						->orWhere('price', 'LIKE', $keyWord)
						->orWhere('year', 'LIKE', $keyWord)
						->orWhere('description', 'LIKE', $keyWord)
						->orWhere('n_pages', 'LIKE', $keyWord)
						->orWhere('format_b', 'LIKE', $keyWord)
						->orWhere('editorial', 'LIKE', $keyWord)
						->paginate(10),
					
						
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->code = null;
		$this->name = null;
		$this->image = null;
		$this->author = null;
		$this->price = null;
		$this->year = null;
		$this->description = null;
		$this->n_pages = null;
		$this->format_b = null;
		$this->editorial = null;
    }

    public function store()
    {
        $this->validate([
		'code' => 'required',
		'name' => 'required',
		'image' => 'required',
		'author' => 'required',
		'price' => 'required',
		'year' => 'required',
		'description' => 'required',
		'n_pages' => 'required',
		'format_b' => 'required',
		'editorial' => 'required',
        ]);

		$name = md5($this->image . microtime()).'.'.$this->image->extension();
		$this->image->storeAs('files', $name);

        Book::create([ 
			'code' => $this-> code,
			'name' => $this-> name,
			'image' => $name,
			'author' => $this-> author,
			'price' => $this-> price,
			'year' => $this-> year,
			'description' => $this-> description,
			'n_pages' => $this-> n_pages,
			'format_b' => $this-> format_b,
			'editorial' => $this-> editorial
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Book Successfully created.');
    }

    public function edit($id)
    {
        $record = Book::findOrFail($id);

        $this->selected_id = $id; 
		$this->code = $record-> code;
		$this->name = $record-> name;
		$this->image = $record-> image;
		$this->author = $record-> author;
		$this->price = $record-> price;
		$this->year = $record-> year;
		$this->description = $record-> description;
		$this->n_pages = $record-> n_pages;
		$this->format_b = $record-> format_b;
		$this->editorial = $record-> editorial;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'code' => 'required',
		'name' => 'required',
		'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
		'author' => 'required',
		'price' => 'required',
		'year' => 'required',
		'description' => 'required',
		'n_pages' => 'required',
		'format_b' => 'required',
		'editorial' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Book::find($this->selected_id);
            $record->update([ 
			'code' => $this-> code,
			'name' => $this-> name,
			'image' => $this-> image,
			'author' => $this-> author,
			'price' => $this-> price,
			'year' => $this-> year,
			'description' => $this-> description,
			'n_pages' => $this-> n_pages,
			'format_b' => $this-> format_b,
			'editorial' => $this-> editorial
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Book Successfully updated.');
        }
    }

	public function deleteId($id)
	{
		$this->deleteId = $id;
	}

    public function delete()
    {
        
            Book::find($this->deleteId)->delete();
           
    }
}
