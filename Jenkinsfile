pipeline {
    agent any

    environment {
        APP_NAME = "php-app"

        // Docker Hub
        DOCKER_IMAGE = "wizzidevs/php-app"
        DOCKER_TAG = "latest"
        DOCKER_CREDENTIALS = "docker-hub-azure"

        // Azure
        ACR_LOGIN = "appspraktikum.azurecr.io"
        ACR_IMAGE = "php-app"
        ACR_TAG = "latest"
        ACR_CREDENTIALS = "acr-credentials" // Jenkins Credentials ID for ACR
    }

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Docker Build & Test') {
            steps {
                sh '''
                    echo "Building test image..."
                    docker build -t ${DOCKER_IMAGE}:test .

                    docker rm -f ${APP_NAME}_test 2>/dev/null || true
                    docker run -d --rm -p 8090:80 --name ${APP_NAME}_test ${DOCKER_IMAGE}:test

                    sleep 5

                    echo "Health checking container..."
                    curl -f http://localhost:8090 || (echo "Health check failed!" && exit 1)

                    docker stop ${APP_NAME}_test
                '''
            }
        }

        stage('Push to Docker Hub') {
            steps {
                withCredentials([usernamePassword(credentialsId: "${DOCKER_CREDENTIALS}", usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    sh '''
                        echo $DOCKER_PASS | docker login -u $DOCKER_USER --password-stdin

                        docker build -t ${DOCKER_IMAGE}:${DOCKER_TAG} .
                        docker push ${DOCKER_IMAGE}:${DOCKER_TAG}

                        docker logout
                    '''
                }
            }
        }

        stage('Push to Azure ACR') {
            steps {
                withCredentials([usernamePassword(credentialsId: "${ACR_CREDENTIALS}", usernameVariable: 'ACR_USER', passwordVariable: 'ACR_PASS')]) {
                    sh '''
                        echo "Logging in to ACR..."
                        echo $ACR_PASS | docker login ${ACR_LOGIN} -u $ACR_USER --password-stdin

                        docker tag ${DOCKER_IMAGE}:${DOCKER_TAG} ${ACR_LOGIN}/${ACR_IMAGE}:${ACR_TAG}
                        docker push ${ACR_LOGIN}/${ACR_IMAGE}:${ACR_TAG}

                        docker logout ${ACR_LOGIN}
                    '''
                }
            }
        }
    }

    post {
        always {
            sh 'docker system prune -f || true'
        }
        success {
            echo 'SUCCESS: Image pushed to Docker Hub & ACR.'
        }
        failure {
            echo 'FAILED: Check pipeline logs.'
        }
    }
}
