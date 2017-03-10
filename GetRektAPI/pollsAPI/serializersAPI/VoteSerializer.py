from rest_framework import serializers
from pollsAPI.models import Vote
from django.contrib.auth.models import User


class VoteSerializer(serializers.ModelSerializer):
    idUser = serializers.ReadOnlyField(source='user.id')
    idVideo = serializers.ReadOnlyField(source='video.id')
    class Meta:
        model = Vote
        fields = ('dateDeCreation','idUser','idVideo')