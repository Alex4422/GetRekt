from rest_framework import serializers
from pollsAPI.models import Commentaire
from django.contrib.auth.models import User


class CommentaireSerializer(serializers.ModelSerializer):
    idUser = serializers.ReadOnlyField(source='user.id')
    idVideo = serializers.ReadOnlyField(source='video.id')
    class Meta:
        model = Commentaire
        fields = ('id','message','dateDeCreation','idUser','idVideo')