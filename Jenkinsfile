pipeline {
    agent { docker { image 'php' } }
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
