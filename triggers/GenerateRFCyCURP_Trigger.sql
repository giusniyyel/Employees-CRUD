CREATE TRIGGER `generateRFCCURP` BEFORE INSERT ON `employees`
 FOR EACH ROW BEGIN

	set @var1 = 2;
	set @var2 = 2;
	set @var3 = 2;
	set @var4 = 2;

	/*FIRST LETTER FATHER LASTNAME*/
	set @fllp = UPPER(NEW.last_name);
	set @fllp=REPLACE(@fllp,'Á','A');
	set @fllp=REPLACE(@fllp,'É','E');
	set @fllp=REPLACE(@fllp,'Í','I');
	set @fllp=REPLACE(@fllp,'Ó','O');
	set @fllp=REPLACE(@fllp,'Ú','U');
	set @fllp=REPLACE(@fllp,'Ñ','X');
	set @flastname=LEFT(TRIM(@fllp),1);

	/*FIRST VOCAL FATHER LASTNAME*/
	REPEAT
	set @fvlp=(SELECT SUBSTR(@fllp, @var1, 1));
	set @var1 = @var1 + 1;
	UNTIL @fvlp="A" OR @fvlp="E" OR @fvlp="I" OR @fvlp="O" OR @fvlp="U"
	END REPEAT;

	/*FIRST LETTER MOTHER LASTNAME*/
	set @fllm = UPPER(NEW.second_lastname);

	set @fllm=REPLACE(@fllm,'Á','A');
	set @fllm=REPLACE(@fllm,'É','E');
	set @fllm=REPLACE(@fllm,'Í','I');
	set @fllm=REPLACE(@fllm,'Ó','O');
	set @fllm=REPLACE(@fllm,'Ú','U');
	set @fllm=REPLACE(@fllm,'Ñ','X');
	set @mlastname=LEFT(TRIM(@fllm),1);

	/*FIRST LETTER NAME*/
	set @fln = UPPER(NEW.first_name);
	set @fln=REPLACE(@fln,'Á','A');
	set @fln=REPLACE(@fln,'É','E');
	set @fln=REPLACE(@fln,'Í','I');
	set @fln=REPLACE(@fln,'Ó','O');
	set @fln=REPLACE(@fln,'Ú','U');
	set @fln=REPLACE(@fln,'Ñ','X');

	set @space=LOCATE(" ",@fln);

	IF @fln='MARIA JOSE' THEN
	set @name=REPLACE(@fln,'MARIA','');

	ELSEIF @fln='JOSE MARIA' THEN
	set @name=REPLACE(@fln,'JOSE','');

	ELSEIF @space!=0 THEN
	set @fln=REPLACE(@fln,'MARIA','');
	set @fln=REPLACE(@fln,'MA.','');
	set @fln=REPLACE(@fln,'JOSE','');
	set @name=REPLACE(@fln,'J.','');

	ELSEIF @space=0 THEN
	set @name=@fln;
	END IF;

	set @firstname=LEFT(TRIM(@name),1);

	/*BIRTHDATE*/
		/*YEAR*/
	set @tdy = RIGHT(YEAR(NEW.birth_date),2);

		/*MONTH*/
	set @tdm = MONTH(NEW.birth_date);
	 IF @tdm<10 THEN
		set @month=CONCAT('0',@tdm);
	 ELSEIF @tdm>10 THEN
		set @month=@tdm;
	 END IF;
				
		/*DAY*/
	set @tdd = DAY(NEW.birth_date);
	 IF @tdd<10 THEN
		set @day=CONCAT('0',@tdd);
	 ELSEIF @tdd>10 THEN
		set @day=@tdd;
	 END IF;
	 
	set @daterfc = CONCAT(@tdy,@month,@day);

	/*GENERATE HOMOCLAVE RFC*/
	set @hclave = (SELECT UPPER(SUBSTRING(MD5(RAND()) FROM 1 FOR 3)));

	set @hclave=REPLACE(@hclave,'Á','A');
	set @hclave=REPLACE(@hclave,'É','E');
	set @hclave=REPLACE(@hclave,'Í','I');
	set @hclave=REPLACE(@hclave,'Ó','O');
	set @hclave=REPLACE(@hclave,'Ú','U');
	set @hclave=REPLACE(@hclave,'Ñ','X');

	/*GENERATE RFC*/
	SET NEW.emp_rfc = CONCAT(@flastname,@fvlp,@mlastname,@firstname,@daterfc,@hclave);

	/*GENDER*/
	set @gender = NEW.gender;
	set @gender=REPLACE(@gender,'M','H');
	set @gender=REPLACE(@gender,'F','M');

	/*TWO LETTERS OF STATE*/
	set @birthstate = UPPER(NEW.birth_state);
	set @state = (SELECT estados.Siglas FROM estados WHERE estados.Estado = @birthstate);

	/*NEXT CONSONANT FATHER LASTNAME*/
	REPEAT
		set @flpc = (SELECT SUBSTR(@fllp,@var2,1));
		set @var2 = @var2 + 1;
		UNTIL @flpc!="A" AND @flpc!="E" AND @flpc!="I" AND @flpc!="O" AND @flpc!="U"
	END REPEAT;

	/*NEXT CONSONANT MOTHER LASTNAME*/
	REPEAT
		set @flmc = (SELECT SUBSTR(@fllm,@var3,1));
		set @var3 = @var3 + 1;
		UNTIL @flmc!="A" AND @flmc!="E" AND @flmc!="I" AND @flmc!="O" AND @flmc!="U"
	END REPEAT;

	/*NEXT CONSONANT NAME*/
	REPEAT
		set @fnc = (SELECT SUBSTR(TRIM(@name),@var4,1));
		set @var4 = @var4 + 1;
		UNTIL @fnc!="A" AND @fnc!="E" AND @fnc!="I" AND @fnc!="O" AND @fnc!="U"
	END REPEAT;

	/*GENERATE HOMOCLAVE*/
	set @birth = YEAR(NEW.birth_date);

	IF (@birth<1999) THEN
		set @dif = (SELECT ROUND(RAND()*9));
	ELSE
		set @dif = (SELECT UPPER(SUBSTRING(MD5(RAND()) FROM 1 FOR 1)));
	END IF;

	set @random = (SELECT UPPER(ROUND(RAND()*9)));

	SET NEW.emp_curp = CONCAT(@flastname,@fvlp,@mlastname,@firstname,@daterfc,@gender,@state,@flpc,@flmc,@fnc,@dif,@random);
         
END