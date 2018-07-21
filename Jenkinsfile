pipeline {
  agent { dockerfile true }
  stages {
    stage('Build') {
      steps {
        sh 'php --version'
      }
    }
    stage('Testing') {
      steps {
        sh 'make ci'
      }
    }
  }
}
