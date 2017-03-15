from rest_framework import serializers
from pollsAPI.model.User import User


class UserSerializer(serializers.ModelSerializer):
    class Meta:
        model = User
        fields = ('id','pseudo', 'email', 'motDePasse', 'administrateur','dateDeCreation')