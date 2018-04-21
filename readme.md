[![Build Status](https://travis-ci.org/httpoz/coverage.svg)](https://travis-ci.org/httpoz/coverage)
[![codecov](https://codecov.io/gh/httpoz/coverage/branch/master/graph/badge.svg)](https://codecov.io/gh/httpoz/coverage)

```bash
ogdir=$(pwd) && cd build/logs 
&& curl -X POST path_to_your_application/hooks/e43bb9b0-4451-11e8-a463-b580b565395c/metric -F 'report=@clover.xml' 
&& cd $ogdir

```