from rest_framework import serializers
from pollsAPI.models import Choice, Question
from django.contrib.auth.models import User


class ChoiceSerializer(serializers.ModelSerializer):
    question = serializers.SlugRelatedField(read_only=False,queryset=Question.objects.all(),slug_field='id')
    
    class Meta:
        model = Choice
        fields = ('id','question', 'choice_text', 'votes')
