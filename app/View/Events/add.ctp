aianeraneroort
        
<?php
$current_year = date('Y');
$min_year = $current_year;
$max_year = $current_year+8;
echo $this->Form->create('Event');
echo $this->Form->input('title');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('publish_on',array('minYear'=>$min_year,'maxYear'=>$max_year,));

?>
        <?php 
        echo $this->Form->end('Save Post');
        ?>

<script>
    $(document).ready(function(){
    var selectedM = $("select[id=EventPublishOnMonth]").attr('value'); 
    var selectedD = $("select[id=EventPublishOnDay]").attr('value'); 
    var selectedY = $("select[id=EventPublishOnYear]").attr('value'); 
    
    $("select").blur(function(){
        
        if($("select[id=EventPublishOnMonth]").val()<=selectedM)
        {
            if($("select[id=EventPublishOnDay]").val()<=selectedD)
            {
              if($("select[id=EventPublishOnYear]").val()<=selectedY)
                {
                    
                    if(($("select[id=EventPublishOnYear]").val()==selectedY)&&($("select[id=EventPublishOnMonth]").val()==selectedM)&&($("select[id=EventPublishOnDay]").val()==selectedD))
                    {
                      
                    }  
                    else{
                       $("select[id=EventPublishOnYear]").val(selectedY);
                       $("select[id=EventPublishOnMonth]").val(selectedM);
                       $("select[id=EventPublishOnDay]").val(selectedD);
                    }
                }  
            }
        }
    })
    });
</script>