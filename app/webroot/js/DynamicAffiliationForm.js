var AffiliationRows=0;
		function setDefaultNumberOfAffiliations(x){
			AffiliationRows= x;
		}
function addAffiliation() {
			AffiliationRows++;
			//adding a clone of the first row, and rename it
			$('#AffiliationRow0').clone(true).attr('id','AffiliationRow'+AffiliationRows).insertAfter('#AffiliationRow0');
			//modifying inner fields to match cake data format!
			$('#AffiliationRow'+AffiliationRows+ '>input').each(function(index){
				if (this.id == 'Affiliation0Id'){
					this.id = 'Affiliation'+AffiliationRows+'Id';
					this.name = 'data[Affiliation]['+AffiliationRows+'][id]';
					this.value = '';

				}
				if (this.id == 'Affiliation0PersonId'){
					this.id = 'Affiliation'+AffiliationRows+'PersonId';
					this.name = 'data[Affiliation]['+AffiliationRows+'][person_id]';
				}
			});
			$('#AffiliationRow'+AffiliationRows+ '>td>div>div>input').each(function(index){
				if (this.id == 'Affiliation0Affiliation'){
					this.id = 'Affiliation'+AffiliationRows+'Affiliation';
					this.name = 'data[Affiliation]['+AffiliationRows+'][affiliation]';
					this.value = '';

				}
			});
			$('#AffiliationRow'+AffiliationRows+ '>td>button').each(function(index){
				if(this.id == 'Affiliation0AddButton'){
					this.id = 'Affiliation'+AffiliationRows+'AddButton';
				}
				if(this.id == 'Affiliation0RemoveButton'){
					this.id = 'Affiliation'+AffiliationRows+'RemoveButton';
					this.setAttribute('onclick', "removeAffiliation("+AffiliationRows+")");
					$(this).removeClass('hidden');
					}
			});
			}
		
function removeAffiliation(x) {
			if (x!==0){
				$('#AffiliationRow'+x).remove();
			}else{alert('can\'t remove this field');}
			
		}
