<?php defined('BASEPATH') OR exit('No direct script access allowed');

    use ElephantIO\Client;
    use ElephantIO\Engine\SocketIO\Version1X;
    
    class GNC_socket {
        
        function test(){
            echo 'test lib socket';
        }
        
        
        function send_message($data){
            $client = new Client(new Version1X('http://localhost:3001'));
            $client->initialize();
            $client->emit('send_msg', $data);
            $client->close();
            
            return TRUE;
        }
        
    }
    