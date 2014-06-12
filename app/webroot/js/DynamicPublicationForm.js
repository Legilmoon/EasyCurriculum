var PublicationRows=0;
		function setDefaultNumberOfPublications(x){
			PublicationRows= x;
		}
function addPublication() {
			PublicationRows++;
			//adding a clone of the first row, and rename it
			$('#PublicationRow0').clone(true).attr('id','PublicationRow'+PublicationRows).insertAfter('#PublicationRow0');
			//modifying inner fields to match cake data format!
			$('#PublicationRow'+PublicationRows+ '>input').each(function(index){
				if (this.id == 'Publication0Id'){
					this.id = 'Publication'+PublicationRows+'Id';
					this.name = 'data[Publication]['+PublicationRows+'][id]';
					this.value = '';

				}
				if (this.id == 'Publication0PersonId'){
					this.id = 'Publication'+PublicationRows+'PersonId';
					this.name = 'data[Publication]['+PublicationRows+'][person_id]';
				}
			});
			$('#PublicationRow'+PublicationRows+ '>td>div>div>input').each(function(index){
				if (this.id == 'Publication0Title'){
					this.id = 'Publication'+PublicationRows+'title';
					this.name = 'data[Publication]['+PublicationRows+'][title]';
					$(this).val('');
				}
			});
			$('#PublicationRow'+PublicationRows+ '>td>div>div>input').each(function(index){
				if (this.id == 'Publication0Text'){
					this.id = 'Publication'+PublicationRows+'text';
					this.name = 'data[Publication]['+PublicationRows+'][text]';
					$(this).val('');
				}
			});
			$('#PublicationRow'+PublicationRows+ '>td>button').each(function(index){
				if(this.id == 'Publication0AddButton'){
					this.id = 'Publication'+PublicationRows+'AddButton';
				}
				if(this.id == 'Publication0RemoveButton'){
					this.id = 'Publication'+PublicationRows+'RemoveButton';
					this.setAttribute('onclick', "removePublication("+PublicationRows+")");
					$(this).removeClass('hidden');
					}
			});
			}
		
function removePublication(x) {
			if (x!==0){
				$('#PublicationRow'+x).remove();
			}else{alert('can\'t remove this field');}
			
		}
