from rest_framework import serializers
from pollsAPI.models import Choice
from django.contrib.auth.models import User


class ChoiceSerializer(serializers.ModelSerializer):
    question = serializers.ReadOnlyField(source='question.question_text')
    class Meta:
        model = Choice
        fields = ('question', 'choice_text', 'votes')

