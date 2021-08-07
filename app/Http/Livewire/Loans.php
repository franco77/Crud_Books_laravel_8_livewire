<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\Book;

class Loans extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_customer, $id_book, $loan_date, $notes, $status;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.loans.view', [
            'loans' => Loan::latest()
						->orWhere('id_customer', 'LIKE', $keyWord)
						->orWhere('id_book', 'LIKE', $keyWord)
						->orWhere('loan_date', 'LIKE', $keyWord)
						->orWhere('notes', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->paginate(10),
                        'customers' => Customer::all(),  
                        'books' => Book::all(),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_customer = null;
		$this->id_book = null;
		$this->loan_date = null;
		$this->notes = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'id_customer' => 'required',
		'id_book' => 'required',
		'loan_date' => 'required',
		'notes' => 'required',
		'status' => 'required',
        ]);

        Loan::create([ 
			'id_customer' => $this-> id_customer,
			'id_book' => $this-> id_book,
			'loan_date' => $this-> loan_date,
			'notes' => $this-> notes,
			'status' => $this-> status
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Loan Successfully created.');
    }

    public function edit($id)
    {
        $record = Loan::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_customer = $record-> id_customer;
		$this->id_book = $record-> id_book;
		$this->loan_date = $record-> loan_date;
		$this->notes = $record-> notes;
		$this->status = $record-> status;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_customer' => 'required',
		'id_book' => 'required',
		'loan_date' => 'required',
		'notes' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Loan::find($this->selected_id);
            $record->update([ 
			'id_customer' => $this-> id_customer,
			'id_book' => $this-> id_book,
			'loan_date' => $this-> loan_date,
			'notes' => $this-> notes,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Loan Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Loan::where('id', $id);
            $record->delete();
        }
    }
}
