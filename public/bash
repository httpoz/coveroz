ogdir=$(pwd)
&& commit=$(git rev-parse --short HEAD)
&& cd build/logs
&& curl -X POST https://coverage-oz.herokuapp.com/hooks/$1/metric -F commit=${commit} -F 'report=@clover.xml'
&& cd $ogdir