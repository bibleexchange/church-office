function confirmDelete(transaction){
	
	var hiddenForm = document.getElementById("delete-form-"+transaction);
	
	if(hiddenForm.className !== 'show'){
		hiddenForm.className = 'show';
	}else{
		hiddenForm.className = 'hidden';
	}

}