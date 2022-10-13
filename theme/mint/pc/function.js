function ch(obj) {
    var str = obj.src;
    if (str.indexOf('_sel.png') < 0) {
        if (str.indexOf('_on.png') < 0) {
            ss = str.substr(0, str.indexOf('.png'))
            obj.src = ss + "_on.png";
        } else {
            ss = str.substr(0, str.indexOf('_on.png'))
            obj.src = ss + ".png";
        }
    }
}
function ch_new(obj){
    var str = obj.src;
    if(str.indexOf('_over.png') < 0){
        ss = str.substr(0, str.indexOf('.png'))
        obj.src = ss + "_over.png";
    }else{
        ss = str.substr(0, str.indexOf('_over.png'))
        obj.src = ss + ".png";
    }
}

function EnNumCheck(word)
{
    var str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    for (i=0; i< word.length; i++)
    {
        idcheck = word.charAt(i);
        for (j = 0 ;  j < str.length ; j++)
        {
            if (idcheck == str.charAt(j)) break;
            if (j+1 == str.length)
            {
                return false;
            }
        }
    }
    return true;
}

function NumCommaCheck(word)
{
    var str = ",1234567890";
    for (i=0; i< word.length; i++)
    {
        idcheck = word.charAt(i);
        for (j = 0 ;  j < str.length ; j++)
        {
            if (idcheck == str.charAt(j)) break;
            if (j+1 == str.length)
            {
                return false;
            }
        }
    }
    return true;
}

function NumDash(word)
{
    var str = "-1234567890";
    for (i=0; i< word.length; i++)
    {
        idcheck = word.charAt(i);
        for (j = 0 ;  j < str.length ; j++)
        {
            if (idcheck == str.charAt(j)) break;
            if (j+1 == str.length)
            {
                return false;
            }
        }
    }
    return true;
}

function NumCheck(word)
{
    var str = "1234567890";
    for (i=0; i< word.length; i++) {
        idcheck = word.charAt(i);
        for (j = 0 ;  j < str.length ; j++)
        {
            if (idcheck == str.charAt(j)) break;
            if (j+1 == str.length)
            {
                return false;
            }
        }
    }
    return true;
}
function IsPhoneChek(strNumber)
{
    var regExpr = /^[0-9]{10,11}$/;
    if ( regExpr.test( strNumber ) )
        return true;
    else
        return false;
}
function IsPhoneChekm(strNumber)
{
    var regExpr = /^[0-9]{3,4}$/;

    if ( regExpr.test( strNumber ) )
        return true;
    else
        return false;
}

function keyCheck(){
    if(event.keyCode < 48 || event.keyCode > 57)
    {
        alert("¼ýÀÚ¸¸ »ç¿ëÇÒ¼ö ÀÖ½À´Ï´Ù");
        event.returnValue= false ;
    }
}
