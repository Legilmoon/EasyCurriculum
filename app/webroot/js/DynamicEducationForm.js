		var EducationRows=0;
		function setDefaultNumberOfEducations(x){
			EducationRows= x;
		}

		
		function addEducation() {
			EducationRows++;
			//adding a clone of the first row, and rename it
			$('#EducationRow0').clone(true).attr('id','EducationRow'+EducationRows).insertAfter('#EducationRow0');
			//modifying inner fields to match cake data format!
			$('#EducationRow'+EducationRows+ '>input').each(function(index){
				if (this.id == 'Education0Id'){
					this.id = 'Education'+EducationRows+'Id';
					this.name = 'data[Education]['+EducationRows+'][id]';
					this.value = '';

				}
				if (this.id == 'Education0PersonId'){
					this.id = 'Education'+EducationRows+'PersonId';
					this.name = 'data[Education]['+EducationRows+'][person_id]';
				}
			});
			
			$('#EducationRow'+EducationRows+ '>td>div>div>select').each(function(index){
				if (this.id == 'Education0CountryId'){
					this.id = 'Education'+EducationRows+'CountryId';
					this.name = 'data[Education]['+EducationRows+'][country_id]';
				}
				if (this.id == 'Education0BeginDateYear'){
					this.id = 'Education'+EducationRows+'BeginDateYear';
					this.name = 'data[Education]['+EducationRows+'][begin_date]';
				}
				if (this.id == 'Education0EndDateYear'){
					this.id = 'Education'+EducationRows+'EndDateYear';
					this.name = 'data[Education]['+EducationRows+'][end_date]';
				}
				if (this.id == 'Education0DegreeId'){
					this.id = 'Education'+EducationRows+'DegreeId';
					this.name = 'data[Education]['+EducationRows+'][degree_id]';
				}
			});
			$('#EducationRow'+EducationRows+ '>td>div>div>input').each(function(index){
				if (this.id == 'Education0SchoolName'){
					this.id = 'Education'+EducationRows+'SchoolName';
					this.name = 'data[Education]['+EducationRows+'][school_name]';
					this.value = '';

				}
				if (this.id == 'Education0OriginalTitle'){
					this.id = 'Education'+EducationRows+'OriginalTitle';
					this.name = 'data[Education]['+EducationRows+'][original_title]';
					this.value = '';

				}
			});
			$('#EducationRow'+EducationRows+ '>td>button').each(function(index){
				if(this.id == 'Education0AddButton'){
					this.id = 'Education'+EducationRows+'AddButton';
				}
				if(this.id == 'Education0RemoveButton'){
					this.id = 'Education'+EducationRows+'RemoveButton';
					this.setAttribute('onclick', "removeEducation("+EducationRows+")");
					$(this).removeClass('hidden');
					}
				
			});
			
		}

		function removeEducation(x) {
			if (x!==0){
				$('#EducationRow'+x).remove();
			}else{alert('can\'t remove this field');}
			
		}