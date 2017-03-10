from rest_framework import serializers
from pollsAPI.models import Video
from django.contrib.auth.models import User


class VideoSerializer(serializers.ModelSerializer):
    commentaires = CommentaireSerializer(many=True, read_only=True)
    votes = VoteSerializer(many=True,read_only=True)
    idUser = serializers.ReadOnlyField(source='user.id')
    idCategorie = serializers.ReadOnlyField(source='categorie.id')
    class Meta:
        model = Video
        fields = ('titre', 'lien', 'image', 'dateDeCreation','description','commentaires','votes','idUser')