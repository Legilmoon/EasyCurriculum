$( document ).ready(function() {

});

var ProfexpeRows=0;
var nbLang =0;
function setDefaultNumberOfLanguages(x){nbLang =x;}
function setDefaultNumberOfProfexpes(x){ProfexpeRows= x;}


function toggleEndDateField(x){
	if(!$('#Profexpe'+x+'Ongoing').is(':checked')){
		$('#Profexpe'+x+'EndDateMonth').removeClass('hidden');
		$('#Profexpe'+x+'EndDateDay').removeClass('hidden');
		$('#Profexpe'+x+'EndDateYear').removeClass('hidden');
	}	
	else{
		$('#Profexpe'+x+'EndDateMonth').addClass('hidden');
		$('#Profexpe'+x+'EndDateMonth').val('selected', 'NULL');

		$('#Profexpe'+x+'EndDateDay').addClass('hidden');
		$('#Profexpe'+x+'EndDateDay').val('selected', '1');

		$('#Profexpe'+x+'EndDateYear').addClass('hidden');
		$('#Profexpe'+x+'EndDateYear').val('selected', '1');

	}

}


function addProfexpe(nbLang) {
	ProfexpeRows++;
			//adding a clone of the  pack of rows, and rename them
			for (var i = 0; i<nbLang; i++){
				$('#ProfexpeRow0'+i).clone(true).attr('id','ProfexpeRow'+ProfexpeRows+i).appendTo('#ProfexpeTable');
			//modifying inner fields to match cake data format!
			
			$('#ProfexpeRow'+ProfexpeRows+i+'>input').each(function(index){
				if (this.id == 'Profexpe0Id'){
					this.id = 'Profexpe'+ProfexpeRows+'Id';
					this.name = 'data[Profexpe]['+ProfexpeRows+'][id]';
					this.value = '';

				}
				if (this.id == 'Profexpe0PersonId'){
					this.id = 'Profexpe'+ProfexpeRows+'PersonId';
					this.name = 'data[Profexpe]['+ProfexpeRows+'][person_id]';
				}
				if (this.id == 'Profexpe0ProfexpeTranslation'+i+'Id'){
					this.id = 'Profexpe'+ProfexpeRows+'ProfexpeTranslation'+i+'Id';
					this.name = 'data[Profexpe]['+ProfexpeRows+'][ProfexpeTranslation]['+i+'][id]';
					this.value = '';
				}
				if (this.id == 'Profexpe0ProfexpeTranslation'+i+'ProfexpeId'){
					this.id = 'Profexpe'+ProfexpeRows+'ProfexpeTranslation'+i+'ProfexpeId';
					this.name = 'data[Profexpe]['+ProfexpeRows+'][ProfexpeTranslation]['+i+'][professional_experience_id]';
					this.value = '';
				}
				if (this.id == 'Profexpe0ProfexpeTranslation'+i+'Lang'){
					this.id = 'Profexpe'+ProfexpeRows+'ProfexpeTranslation'+i+'Lang';
					this.name = 'data[Profexpe]['+ProfexpeRows+'][ProfexpeTranslation]['+i+'][lang]';
				}

			});
$('#ProfexpeRow'+ProfexpeRows+i+ '>td>div>div>input').each(function(index){
	if (this.id == 'Profexpe0Employer'){
		this.id = 'Profexpe'+ProfexpeRows+'Employer';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][employer]';
		this.value = '';

	}
	if (this.id == 'Profexpe0PositionsDates'){
		this.id = 'Profexpe'+ProfexpeRows+'PositionsDates';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][positions_dates]';
		this.value = '';
	}

	if (this.id == 'Profexpe0ProfexpeTranslation'+i+'PositionsDates'){
		this.id = 'Profexpe'+ProfexpeRows+'ProfexpeTranslation'+i+'PositionsDates';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][ProfexpeTranslation]['+i+'][positions_dates]';
		this.value = '';
	}

});
$('#ProfexpeRow'+ProfexpeRows+i+ '>td>div>div>div>div>input').each(function(index){
	if (this.id == 'Profexpe0Ongoing'){
		this.id = 'Profexpe'+ProfexpeRows+'Ongoing';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][ongoing]';
		this.setAttribute('onclick', 'toggleEndDateField('+ProfexpeRows+')');	
	}
	if (this.id == 'Profexpe0Ongoing_'){
		this.id = 'Profexpe'+ProfexpeRows+'Ongoing_';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][ongoing]';
	}
});
$('#ProfexpeRow'+ProfexpeRows+i+ '>td>div>div>div>select').each(function(index){
	if (this.id == 'Profexpe0BeginDateMonth'){
		this.id = 'Profexpe'+ProfexpeRows+'BeginDateMonth';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][begin_date][month]';
	}
	if (this.id == 'Profexpe0BeginDateDay'){
		this.id = 'Profexpe'+ProfexpeRows+'BeginDateDay';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][begin_date][day]';
	}
	if (this.id == 'Profexpe0BeginDateYear'){
		this.id = 'Profexpe'+ProfexpeRows+'BeginDateYear';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][begin_date][year]';
	}
	if (this.id == 'Profexpe0EndDateMonth'){
		this.id = 'Profexpe'+ProfexpeRows+'EndDateMonth';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][end_date][month]';
	}
	if (this.id == 'Profexpe0EndDateDay'){
		this.id = 'Profexpe'+ProfexpeRows+'EndDateDay';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][end_date][day]';
	}
	if (this.id == 'Profexpe0EndDateYear'){
		this.id = 'Profexpe'+ProfexpeRows+'EndDateYear';
		this.name = 'data[Profexpe]['+ProfexpeRows+'][end_date][year]';
	}
});
$('#ProfexpeRow'+ProfexpeRows+i+ '>td>button').each(function(index){
	if(this.id == 'Profexpe0AddButton'){
		this.id = 'Profexpe'+ProfexpeRows+'AddButton';
	}
	if(this.id == 'Profexpe0RemoveButton'){
		this.id = 'Profexpe'+ProfexpeRows+'RemoveButton';
		this.setAttribute('onclick', 'removeProfexpe('+ProfexpeRows+','+nbLang+')');
		$(this).removeClass('hidden');
	}

});
}
}

function removeProfexpe(x, nbLang) {
	if (x!==0){
		for (var i = 0; i<nbLang; i++)
			$('#ProfexpeRow'+x+i).remove();
	}else{alert('can\'t remove this field');}

}


