<?php 
class arrayEntry {
	$array_test = array(1,2,3,4,5,6)
    $arrayKey = array('key1' => '1','key2' => '2','key2' => '2');

    public getCount () {
        return count($array_test)
    }

	#create a new array and copy a array to the new array 
	public arryAdd () {
		array_pad($array_test, 8, 0);
        #replace the date in the offset -5
		#array_pad($array_test, -5, 0);
        echo array_pad,${array_pad}
	}

	#create multiple array
	public createMultArrary () {
        $raw0={1,2,3,}
        $raw1={4,5,6}
        $raw2={7,8,9}
        $raw4=array($raw0, $raw1, $raw2)
        echo raw4,$raw4
	}

    public listArray () {
        #将array_test 值分别赋值个哦var_name1
        list(var_nam1, var_name2, var_name3) = $array_test
    }

    #截取数组
    public splitArray () {
        subArry = array_slice($array_test,2,2);
        #subArry = {2,3}
    }
    
    #拆分数组
    public chunkArray () {
        $nums=range(1,7)
        subArry = array_chunk($nums,2,2);
        #nums - > nums[2][2], num[0][]={1,2}
    }
    #key
    public keyArray () {
        keyArrVal=array_keys($arrayKey)
        #keyArrVal: key1,key2,key3
        #array_values get the value not the key
    }

    public exitArray () {
        if(array_key_exists('key1', $arrayKey)) {
            echo "key is exist"
        } else {
            echo "key is exist"
        }
    }
    
    public delArray() {
        array_splice($array_test, 2,3) #delete the [2] value
        array_splice($array_test, 2,3) #delete the [2] to the end
    }
    public insertArray {
        $inserVal = array_splice($array_test, 2,0,{"2","3"}
    }

    public arrayToVal{
        $crArryVal = extract($keyArrVal)
    }

    public ValToArray {
        $color=1
        $shap=2
        $arrayVal=compact('color', 'shap')
    }

    public callback_func ($value, $key) {
    }
    
    public callbackArray {
         array_walk($keyArrVal, 'callback_func')
    }

    public findArray {
        in_array("key1",$keyArrVal) #return true
    }
    
    public sortArray {
        #sort rsort usort
        #Assort arsort uasort
        #ksort krsort uksort
        #
        #nasort natcasesort --> like the linux command sort
        #array_multisort   --> sort multiple arrays
        # array_reverse    --> reverse
        # shuffle -->          rand array
        # array_sum       --> get the value for all list items
        # array_merge
        # array_diff
    }

    function filterCallback
    public filterArray {
        array_filter($keyArrVal, 'filterCallback')
    }

    function deletSameArray {
        $mergeVal = array_merge($keyArrVal, $array_test)
        array_unique()
    }

    public pushPopArray {
         # array_push array_pop
    }
}

?>
