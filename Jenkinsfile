pipeline {
  agent {
    docker {
      image 'cli_php71:latest'
    }

  }
  stages {
    stage('build') {
      steps {
        sh 'php --version'
      }
    }
    stage('composer') {
      steps {
        sh 'composer install'
      }
    }
    stage('test') {
      steps {
        sh './vendor/bin/simple-phpunit'
      }
    }
  }
}
