if (( $# == 0 )); then
    echo "No arguments specified!";
    exit;
elif [[ $1 =~ [^A-Za-z] ]] && [[ $2 =~ [^A-Za-z] ]]; then
    echo "First and second arguments must contain only alphabets!";
    exit;
elif [[ $1 =~ [^A-Za-z] ]]; then
    echo "First argument must contain only alphabets!";
    exit;
elif [ ! -f "$1.xml" ]; then
    echo 'XML file with a name of "'$1'" does not exist!';
    exit;
elif [ -z "$2" ]; then
    echo "Second argument is empty!";
    exit
elif [[ $2 =~ [^A-Za-z] ]]; then
    echo "Second argument must contain only alphabets!";
    exit;
elif (( $# > 2 )); then
    echo "Too many arguments specified!";
    exit;
else
    echo 'Passing "'$1'.xml" file as input file to the PHP Script';
    echo 'Passing "'$2'.csv" file as output file to the PHP Script';
    php index.php $1 $2
    exit;
fi