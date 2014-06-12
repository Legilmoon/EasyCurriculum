		var LanguageRows=0;
		function setDefaultNumberOfLanguages(x){
			LanguageRows= x;
		}

		
		function addLanguage() {
			LanguageRows++;
			//adding a clone of the first row, and rename it
			$('#LanguageRow0').clone(true).attr('id','LanguageRow'+LanguageRows).insertAfter('#LanguageRow0');
			//modifying inner fields to match cake data format!
			$('#LanguageRow'+LanguageRows+ '>input').each(function(index){
				if (this.id == 'PersonKnowsLanguage0Id'){
					this.id = 'PersonKnowsLanguage'+LanguageRows+'Id';
					this.name = 'data[PersonKnowsLanguage]['+LanguageRows+'][id]';
					this.value = '';

				}
				if (this.id == 'PersonKnowsLanguage0PersonId'){
					this.id = 'PersonKnowsLanguage'+LanguageRows+'PersonId';
					this.name = 'data[PersonKnowsLanguage]['+LanguageRows+'][person_id]';
				}
			});
			$('#LanguageRow'+LanguageRows+ '>td>div>div>select').each(function(index){
				if (this.id == 'PersonKnowsLanguage0LanguageId'){
					this.id = 'PersonKnowsLanguage'+LanguageRows+'LanguageId';
					this.name = 'data[PersonKnowsLanguage]['+LanguageRows+'][language_id]';
				}
				if (this.id == 'PersonKnowsLanguage0ReadLevel'){
					this.id = 'PersonKnowsLanguage'+LanguageRows+'ReadLevel';
					this.name = 'data[PersonKnowsLanguage]['+LanguageRows+'][read_level]';
				}
				if (this.id == 'PersonKnowsLanguage0WriteLevel'){
					this.id = 'PersonKnowsLanguage'+LanguageRows+'WriteLevel';
					this.name = 'data[PersonKnowsLanguage]['+LanguageRows+'][write_level]';
				}
				if (this.id == 'PersonKnowsLanguage0SpeakLevel'){
					this.id = 'PersonKnowsLanguage'+LanguageRows+'SpeakLevel';
					this.name = 'data[PersonKnowsLanguage]['+LanguageRows+'][speak_level]';
				}
			});
			$('#LanguageRow'+LanguageRows+ '>td>button').each(function(index){
				if(this.id == 'PersonKnowsLanguage0AddButton'){
					this.id = 'PersonKnowsLanguage'+LanguageRows+'AddButton';
				}
				if(this.id == 'PersonKnowsLanguage0RemoveButton'){
					this.id = 'PersonKnowsLanguage'+LanguageRows+'RemoveButton';
					this.setAttribute('onclick', "removeLanguage("+LanguageRows+")");
					$(this).removeClass('hidden');
					}
				
			});
			
		}

		function removeLanguage(x) {
			if (x!==0){
				$('#LanguageRow'+x).remove();
			}else{alert('can\'t remove this field');}
			
		}