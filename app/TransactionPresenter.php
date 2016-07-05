<?php namespace App;

use App\Presenter\Presenter;

class TransactionPresenter extends Presenter {

	public function date(){		
		return \Carbon::parse($this->entity->date)->format('M-d-y h a');
	}
	
	public function lastChangeWasMade(){//2015-03-18 00:04:21
			return \Carbon::now()->parse($this->entity->updated_at)->diffForHumans();
		}
	
}