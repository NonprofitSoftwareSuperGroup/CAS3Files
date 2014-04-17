function answer()//used in sampleQuestion.php
{
	var radioList = document.getElementsByName("ans");//stores radio info

	var radioPicked = false;//true if a bubble is selected

	var i = 0;
	while (!radioPicked && i < radioList.length) 
	{
		if (radioList[i].checked)//a bubble was selected before submition
		{
			radioPicked = true;
		}
	i++;        	
	}

	if (!radioPicked)
	{
		window.alert("An answer must be selected before submiting");
	}

	else
	{
		
		var answer = document.querySelector('input[name = "ans"]:checked').value;
		//stores the value of the selected radio
		
		if(answer=='correct')
		{
			window.location.href = 'surveyAssessment.php';
		}
		
		if(answer=='wrong')
		{
			window.alert("The correct answer is Answer A");
		}
	}
}