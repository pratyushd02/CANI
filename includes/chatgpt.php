<?php
function response($comments){
    $ar = array(
        'prompt'=>'Does'.''.$comments.''.'contain inappropriate words? answer in yes or no',
        'model'=>'text-davinci-003',
        'temperature'=>0.6,
        'max_tokens' => 150,
		'top_p' => 1,
		'frequency_penalty' => 1,
		'presence_penalty' => 1,
        );
        
        $data=json_encode($ar);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://api.openai.com/v1/completions");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
        $data);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization:Bearer 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';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


        $result = curl_exec($ch);
        
            
        curl_close($ch);
            
        $decode = json_decode($result,true);
            
        
        return $decode['choices'][0]['text'];
            
            
            
            
        }		
?>  


