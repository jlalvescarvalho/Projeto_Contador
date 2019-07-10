<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;

/**
 * Upload component
 */
class UploadComponent extends Component
{

    public $max_files = 5;


    public function send( $data )
    {
    	if ( !empty( $data ) ) {
    		if ( count( $data ) > $this->max_files ) {
    			throw new InternalErrorException("Erro tamanho exedido. Max number files accepted is {$this->max_files}", 1);
    		}

    			$filename = $data['name'];
    			$file_tmp_name = $data['tmp_name'];
    			$dir = WWW_ROOT.'plans'.DS.'uploads';
    			$allowed = array('xlsx', 'doc', 'jpg', 'xls');
    			if ( !in_array( substr( strrchr( $filename , '.') , 1 ) , $allowed) ) {
    				throw new InternalErrorException("O formato do arquivo não é aceito...", 1);		
    			}elseif( is_uploaded_file( $file_tmp_name ) ){
                    $filename = Text::uuid().'-'.$filename;

                    $filedb = TableRegistry::get('Planilha');
                    $entity = $filedb->newEntity();
                    $entity->filename = $filename;
                    $filedb->save($entity);

    				move_uploaded_file($file_tmp_name, $dir.DS.$filename);
    			}
    		
    	}
    }
}
?>