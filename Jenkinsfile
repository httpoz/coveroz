pipeline {
  agent none
  stages {
    stage('Build') {
      agent {
        docker {
          image 'php:7.2'
        }

      }
      steps {
        sh 'composer install --no-interaction --prefer-source'
      }
    }
  }
}