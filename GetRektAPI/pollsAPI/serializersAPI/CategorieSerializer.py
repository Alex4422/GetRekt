from rest_framework import serializers
from pollsAPI.models import Categorie
from pollsAPI.serializersAPI.VideoSerializer import VideoSerializer
from django.contrib.auth.models import User


class CategorieSerializer(serializers.ModelSerializer):
    videos = VideoSerializer(many=True, read_only=True)
    class Meta:
        model = Categorie
        fields = ('nom','videos')